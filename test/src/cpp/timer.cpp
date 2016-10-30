#include <iostream>

using namespace std;

int main()
{
	clock_t start,end;
	start = clock();
	end = clock();
	cout<<(double)start<<endl;
	cout<<(double)end<<endl;
	cout<<(double)(end-start)<<endl;
	cout<<fixed<<(double)(end-start)/CLOCKS_PER_SEC<<endl;
	return 0;
}