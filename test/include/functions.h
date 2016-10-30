#ifndef FUNCTIONS_H
#define FUNCTIONS_H

#include <string>

using namespace std;

bool isNumber(char *);
bool exist_file(std::string str);

template <typename string,typename num>
string itostring(num );

int get_pid(const char* );

#endif