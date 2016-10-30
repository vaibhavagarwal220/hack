#include <stdio.h>

void swapPointers(int *a , int *b )                    // function to swap pointers
{
	int temp ;
	temp = *a ;
	*a = *b;
	*b=temp;
}

void printPointerValue(int *a)							// function to print pointer value
{
	printf("%d\n",*a);
}

int compareInts(int *a , int *b)						// function to compare two integers 
{
	int ans ;
	ans = ((*a)>(*b))? 1 : 0 ;							// ternary operators 
	return ans ;
}

int compareStrings(char *a , char *b)					// function to compare strings 
{
   int n = 0;
 
   while (a[n] == b[n]) 
   {
      if ( a[n] == '\0' || b[n] == '\0')
      {
         break;
      }

      n++;
   }
 
   if (a[n] == '\0' && b[n] == '\0')
    return 0; 
   else if(b[n] == '\0' || b[n]<a[n])
  	return 1 ;
  else 
  	return 0 ;
}

void countTillThisNum(int num)						// recursion function 
{
	if(num==1)
	{
		printf("1\n");
		return ;
	}
	printf("%d ",num);
	countTillThisNum(num-1);

}

int main()
{
	int x = 2 , y=3 ;
	int *a = &x , *b = &y ;
	printPointerValue(a);
	printPointerValue(b);
	swapPointers(a,b);
	printPointerValue(a);
	printPointerValue(b);
	int e=compareInts(a,b);
	(e)?printf("x>y\n"):printf("y>x\n");
	char s1[100],s2[100];
	printf("Enter the two strings : ");
	scanf("%s %s",s1,s2);
	printf("%d\n",compareStrings(s1,s2));
	countTillThisNum(10);
}
