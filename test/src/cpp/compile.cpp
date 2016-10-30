#include <fstream>
#include <string.h>
#include <stdio.h>
#include <stdlib.h>
#include "errors.h"
#include <string>
#include <iostream>

using namespace std;

int main(int argc,char *argv[])
{
	string compiler,source_code;
	string command = "bin/compile.sh";

	switch(argc)
	{
	case 1:
		printf("%d\n",ERROR_noArguments);
		exit(EXIT_FAILURE);
	break;

	case 2:
		printf("%d\n",ERROR_noSourceCode);
		exit(EXIT_FAILURE);
	break;

	case 3:
		if(strcmp(argv[1],"gcc") == 0)
		{
			compiler = "gcc";
		}
		else if(strcmp(argv[1],"g++") == 0)
		{
			compiler = "g++";
		}
		else
		{
			printf("%d\n",ERROR_wrongCompiler);
			exit(EXIT_FAILURE);
		}

		source_code = argv[2];
		command = command + " " + compiler + " " + source_code;
		system(command.c_str());
	break;

	default:
		printf("%d\n",ERROR_wrongArguments);
		exit(EXIT_FAILURE);
	}

	string status_filename = argv[2];
	status_filename = "tmp/" + status_filename + ".status";
	string error_filename = argv[2];
	error_filename = "tmp/" + error_filename + ".err";

	fstream status,error;
	status.open(status_filename.c_str(),ios::in | ios::out);
	char compilation_error[100];

	int check = 0;
	status>>check;

	error.open(error_filename.c_str(),ios::in | ios::out);
	if(check)
	{
		printf("Compilation Error : \n");
		while(!error.eof())
		{
			error.getline(compilation_error,100);
			cout<<compilation_error<<endl;
		}
	}
	error.close();
	status.close();

	return 0;	
}