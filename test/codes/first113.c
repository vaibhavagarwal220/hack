#include <stdio.h>

 int count=0;
int hanoi(int n, char beg, char dest, char aux)
{
    if (n == 1)
    {
        count++;
        printf("[%d] Move disk 1 from %c -> %c\n",count,beg, dest);
        return 0;
    }

    hanoi(n - 1, beg, aux, dest);
    count++;
    printf("[%d] Move disk %d from %c -> %c\n",count, n, beg, dest);
    hanoi(n - 1, aux, dest, beg);
}
int main()
{
    int n;
    printf("Enter the number of disks : ");
    scanf("%d", &n);
    printf("Moves involved in the Tower of Hanoi are :\n");
    hanoi(n, 'A', 'C', 'B');
	printf("Total number of steps : %d\n",count);
    return 0;

}

