#include <stdio.h>
#include <stdlib.h>
struct node                                                                                     // structure for stacks
{
    int data;
    struct node *next;
    struct node *arb;
} *hd =NULL , *tl=NULL , *copyhd=NULL;

void insert(int info)																			// function to insert new elements to link list 
{
	struct node * temp ;
	if(hd==NULL)																				// if link list is empty 
	{
		hd= (struct node *)malloc(sizeof(struct node));
		tl=hd;
		hd->data = info ;
		hd->next = NULL ;
	}
	else
	{
		temp= (struct node *)malloc(sizeof(struct node));									 
		temp->data=info;
		temp->next=NULL;
		tl->next=temp;
		tl=temp;
	}
}

int arbi(int n , int a , int s)																		// function to point a node to arbitrary
{
	if(a>s) {
				printf("Out of Range, please enter again\n");
				return 0;
			}
	struct node * temp1=hd ,  *temp2=hd ;
	int i ;
	for(i=1;i<n;i++)
	{
		temp1=temp1->next;
	}
	for(i=1;i<a;i++)
	{
		temp2=temp2->next;
	}
	temp1->arb = temp2;
	return 1;
}

void display_o()																				// display original linked list 
{
	struct node * temp=hd ;
	printf("ORIGINAL\n");
	while(temp!=NULL)
	{
		printf("%d %p %p %p\n",temp->data,temp,temp->next,temp->arb);
		temp=temp->next;
	}
}
void display_c()																				// display copied link list 
{
	struct node * temp=copyhd ;
	printf("COPY\n");
	while(temp!=NULL)
	{
		printf("%d %p %p %p\n",temp->data,temp,temp->next,temp->arb);
		temp=temp->next;
	}
}
void copy()																						// function to create a copy 
{
	struct node *temp = hd , *temp1=NULL , *temp2=NULL , *copy =NULL  ;
	int info = hd->data ;
	while(temp!=NULL)																			// insert a copy in between 
	{
		copy= (struct node *)malloc(sizeof(struct node));
		copy->data=temp->data;
		copy->next=temp->next;
		temp->next = copy ;
		temp=temp->next->next ;
	}
	copyhd=hd->next ;
	temp=hd;
	while(temp!=NULL)																			// link the arbitrary nodes 
	{
		temp->next->arb=temp->arb->next ;
		temp=temp->next->next ;
	}
	display_o();
	printf("\n");
	temp1=hd;
	temp2=copyhd;
	while(temp2->next!=NULL)																	// separate the two linked list 
	{
		temp1->next=temp1->next->next;
		temp1=temp1->next;
		temp2->next=temp2->next->next;
		temp2=temp2->next;
	}
	temp1=0;
	temp1=hd;
	while(temp1->next!=NULL)
	{
		temp1=temp1->next;
	}
	temp1=0;



}

int main()
{
	int s,v,ar,i ;
	printf("Enter the size of linked list : ");
	scanf("%d",&s);
	
	for(i=0;i<s;i++)																		// input the values of nodes 
	{
		printf("Enter the value of node %d \n ",i+1);
		scanf("%d",&v);
		insert(v);
	}

	for(i=0;i<s;i++)																		// input arbitrary nodes 
	{
		printf("Enter the arbitrary node pointed by node %d \n ",i+1);
		scanf("%d",&ar);
		if(!arbi(i+1,ar,s)) i--;
		
	}
	display_o();
	printf("\n");
	copy();
	display_o();
	printf("\n");
	display_c();
}
