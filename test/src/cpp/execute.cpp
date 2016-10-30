#include <fstream>
#include <string.h>
#include <stdio.h>
#include <stdlib.h>
#include "errors.h"
#include <string>
#include <iostream>
#include "functions.h"
#include <unistd.h>
#include <time.h>
#include <cstdlib>
#include <sys/types.h>
#include <signal.h>
#include <stdio.h>

using namespace std;

int main(int argc,char *argv[])
{
	double time_limit,run_time;
	string input_filename,source_code,usr_exe;

	switch(argc)
	{
	case 1:
	case 2:
	case 3:
		cout<<ERROR_wrongArguments<<endl;
		exit(EXIT_FAILURE);
	break;
	case 4:
		time_limit = atof(argv[1]);
		input_filename = argv[2];
		usr_exe = argv[3];
	break;
	default:
		cout<<ERROR_wrongArguments<<endl;
		exit(EXIT_FAILURE);
	}

	string temp = "./input/" + input_filename;
	if(!exist_file(temp))
	{
		cout<<ERROR_ifnf<<endl;
		exit(EXIT_FAILURE);
	}

	temp = "./tmp/" + usr_exe;
	if(!exist_file(temp))
	{
		cout<<ERROR_outnf<<endl;
		exit(EXIT_FAILURE);
	}

	source_code = ".out";
	source_code = usr_exe.substr(0,usr_exe.size() - source_code.size());

	pid_t child = fork();

	clock_t start,end;
	run_time = 0;
	if(child < 0)
	{
		cout<<ERROR_cnotCreated<<endl;
		exit(EXIT_FAILURE);
	}
	else if(child == 0)
	{
		string temp = source_code;
		temp += ".output";

		//freopen(temp.c_str(),"w",stdout);

		string command;
		cout<<"Starting child\n";
		command = "cat ./input/" + input_filename + " | " + "./tmp/" + usr_exe + " > ./tmp/" + source_code + ".output";
		//command = "cat \"./input/" + input_filename + "\" | \"./tmp/" + usr_exe + "\" > \"./tmp/" + source_code + ".output\"";
		//cout<<command<<endl;
		//string command = "./bin/runner.sh";
		//command += " " + input_filename + " " + source_code + " " + usr_exe;
		system(command.c_str());
		cout<<"Ended child\n";
		exit(0);	
	}
	else
	{
		start = clock();
		int pid_usr_exe;
		cout<<"Getting pid\n";
		pid_usr_exe = get_pid(usr_exe.c_str());
		cout<<"Pid obtained\n";
		do
		{
			if(kill(pid_usr_exe,0) == -1)
				break;
			end = clock();
		}
		while((double)(end-start)/CLOCKS_PER_SEC <= time_limit);		
	}
	int run_status;
	if((run_status = get_pid(usr_exe.c_str())))
	{
		cout<<"Time Limit Exceeded\n";
		kill(run_status,SIGKILL);
		return 0;
	}

	/*fstream exe_status;
	string exe_status_filename = source_code + ".status";
	cout<<exe_status_filename<<endl;
	exe_status.open(exe_status_filename.c_str(),ios::in | ios::out);

	if(!exe_status.is_open())
	{
		cout<<ERROR_sfnf<<endl;
		exit(EXIT_FAILURE);
	}

	string check_rstatus;
	exe_status >> check_rstatus;
	if(check_rstatus == "SR")
	{
		cout<<"Successfully executed \n";
	}
	else if(check_rstatus == "RE")
	{
		cout<<"Runtime Error\n";
		exe_status.close();
		return 0;
	}
	exe_status.close();
*/
	run_time = (double)(end-start)/CLOCKS_PER_SEC;
	cout<<"Run time :\t"<<run_time<<endl;	
	return 0;
}