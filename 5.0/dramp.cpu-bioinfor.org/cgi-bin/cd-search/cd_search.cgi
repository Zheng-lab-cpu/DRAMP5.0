#!/usr/bin/perl -w

use strict;
use CGI;

#print "content-type: text/html","\n\n";
###SESSION

use CGI::Session;

my $cgi= new CGI;

my $session = new CGI::Session("driver:File", $cgi , {Directory=>'/tmp'});

my $cookie = $cgi->cookie(CGISESSID =>$session->id );

print $cgi->header(-cookie=>$cookie);

###END SESSION

my $pass_key;
my $query;
my $file_path_name;
my $cd_name="cd_search";

my $q = CGI->new;

$pass_key = $q->param('pass_key');

my $query = "php ../jobs/password.php $pass_key 'DECODE'";

$pass_key = readpipe($query);

if (!$pass_key){

print "<script language='javascript'>;";

print " location.href='http://dramp.cpu-bioinfor.org';";

print "</script>;";

}else{
	$session->param('user_id', $pass_key);
}


#print $session->param('user_id');


my $maxLenth=5;
my @pa=('A'..'Z',0..9,'a'..'z');
my $pa;
my @subname;
$subname[0]=join "",map{$pa[int rand @pa]}0..$maxLenth;
$subname[1]=join "",map{$pa[int rand @pa]}0..$maxLenth;
$subname[2]=join "",map{$pa[int rand @pa]}0..$maxLenth;
my $job_name=join "-",@subname;
my $file_name_ini=join "",@subname;

my $file_name_1=$file_name_ini."\.in";

my $file_name=$cd_name."\_".$file_name_ini;

my $seqs;
my $evalue;
my $maxhit;
my $db;
my $filter;

       $seqs   =$q->param('seqs');
       $db     =$q->param('db');
       $filter =$q->param('filter');
       $evalue =$q->param('evalue');

       if ($evalue eq "") {
	   $evalue = "0.01";
	}


       $maxhit =$q->param('maxhit');   

       if ($maxhit eq "") {
	   $maxhit = "500";
	}
       
       mkdir("/www/wwwroot/dramp.cpu-bioinfor.org/tmp/cd-search_tmp/$file_name",0777);

       my $mkdir_query="mkdir -p -m 755 /www/wwwroot/dramp.cpu-bioinfor.org/tmp/cd-search_tmp/$file_name";

       system($mkdir_query);

       open EOF,">/www/wwwroot/dramp.cpu-bioinfor.org/tmp/cd-search_tmp/$file_name/$file_name_ini.in";
               print EOF $seqs;
       close EOF;

#       $evalue="0.01"  if ($evalue="");
#       $maxhit="500" if ($maxhit="");  

       $query="./bin/rpsblast -query ../../tmp/cd-search_tmp/$file_name/$file_name_ini.in $db -evalue $evalue  -num_descriptions $maxhit  -out  ../../tmp/cd-search_tmp/$file_name/$file_name_ini.out";
	   system($query);

my $content_line;

open DOTA,"</www/wwwroot/dramp.cpu-bioinfor.org/template/tools_result_static.html";
        while (my $line = <DOTA>){
                $content_line .= $line;
        }
close DOTA;

my $line;
if(-e "../../tmp/cd-search_tmp/$file_name/$file_name_ini.out"){
       open EOF,"</www/wwwroot/dramp.cpu-bioinfor.org/tmp/cd-search_tmp/$file_name/$file_name_ini.out";
       my @my_line=<EOF>;
       $line=join "",@my_line;
       $line="<div style='word-break:break-all;overflow-y:scroll;'><pre><code>".$line."</code></pre></div>";       
       close EOF;
}

$content_line =~ s/USERNAME/$pass_key/;

system( `echo -n  $job_name 'http://dramp.cpu-bioinfor.org/tmp/cd-search_tmp/$file_name/$file_name_ini.out '  >> ../../tmp/jobs_tmp/$pass_key`);

my $ll_path = "/www/wwwroot/dramp.cpu-bioinfor.org/tmp/jobs_tmp/$pass_key";

my  $job_numbers = readpipe ("wc -l  $ll_path | cut -d ' ' -f1");
 $job_numbers ++;

my $time = `date  +"%Y-%m-%d %H:%M:%S" >> ../../tmp/jobs_tmp/$pass_key`;

my $pass_query = "php ../jobs/password.php $pass_key 'ENCODE'";

my $new_pass_key = readpipe($pass_query);

$content_line =~ s/JOBSPASSKEY/$new_pass_key/;
$content_line =~ s/JOBSNUMBER/$job_numbers/;

#print qq(<div style="width:300px;height:50px;margin-top:500px auto;">);

my $content_command = $content_line;
$content_command =~ s/LazySheep/$line/;

print qq($content_command);

