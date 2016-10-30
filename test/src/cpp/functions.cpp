#include "functions.h"
#include <ctype.h>
#include <string.h>
#include <stdlib.h>
#include <fstream>
#include <string>

using namespace std;	

bool isNumber(char *str)
{
	int size = strlen(str);
	int flag = 0;
	for(int i=0;i<size;i++)
	{
		if(!isdigit(str[i]))
		{
			flag = 1;
			break;
		}
	}

	if(flag)
	{
		return (false);
	}
	else
	{
		return (true);
	}
}

bool exist_file(string str)
{
	string command;
	command = "./bin/exist_file.sh ";
	command += str;
	system(command.c_str());

	fstream status;
	string status_check;

	status.open("./tmp/file.status",ios::in | ios::out);
	status>>status_check;
	status.close();

	if(status_check == "FE")
		return true;
	else
		return false;
}

template <typename string,typename num>
string itostring(num n)
{
	string str;
	int dig;
	do
	{
		dig = n%10;
		str.push_back((char)(dig+'0'));
	}while(n /= 10);
	return str;
}

int get_pid(const char *str)
{
/*	char line[10];
	char command[50];
	//sprintf(command, "pidof %s",str);  
	FILE *cmd = popen(command, "r");
	fgets(line, 10, cmd);
	pid_t pid = strtoul(line, NULL, 10);
	pclose(cmd);*/
	printf("\n%s\n",str);
	pid_t pid = 0;
	return pid;
}

/*int get_pid(const char *str)
{
	char command[32];  
   	sprintf(command, "pidof %s > run.status",str);  
	system(command);

   	fstream file;
   	file.open("run.status",ios ::in | ios::out);
   	int temp = 0;
   	file>>temp;
   	file.close();
   	system("rm run.status");
   	
   	return temp;
}*/