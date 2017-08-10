#include<stdio.h>
#include<string.h>
#include<sys/types.h>
#include<sys/socket.h>
#include<netinet/in.h>
#include<stdlib.h>
#include<netdb.h>
#include <unistd.h>
#include <arpa/inet.h>
#include <errno.h>
void error(char *msg)
{
perror(msg);
exit(1);
}

int main(int argc,char *argv[]){

int sockfd,portno;
struct sockaddr_in server;
char a[15];
	
	char message[40];
   char reply[40];
   char client[40];
   char password[40];
   char logins[40];


portno =5001;
   
   /* Create a socket point */
   sockfd = socket(AF_INET, SOCK_STREAM, 0);
   
   if (sockfd < 0)
   {
      perror("ERROR opening socket");
      exit(1);
   }
    server.sin_addr.s_addr = inet_addr("127.0.0.1");
    server.sin_family = AF_INET;
    server.sin_port = htons(portno);
 
    //Connect to remote server
    if (connect(sockfd , (struct sockaddr *)&server , sizeof(server)) < 0)
    {
        puts("connect error");
        return 1;
    }
     
    puts("Connected\n");
   
printf("Username> ");
  
	fgets(client,39,stdin);
  send(sockfd,client,39,0);
   printf("Password> ");

	fgets(password,39,stdin);
   send(sockfd,password,39,0);
   
   recv(sockfd,logins,39,0);
   if(logins<0) {
   	error("user not found");
   	exit(1);
   }
	
	me:
	printf("\n\nFAMILY SACCO SYSTEM\n");
	printf("\t\t\t\tHELP MENU\n");
	printf("\t\t\t---------------------\n");
	printf("ENTER A COMMAND OF YOUR CHOICE FROM ABOVE\n");
	printf("-Contribution\n-CheckContribution\n-BenefitCheck\n-Requestloan\n-LoanStatus\n-RepaymentDetails\n-Idea\n");
	fgets(a,14,stdin);
   send(sockfd,a,15,0);
	
recv(sockfd,message,39,0);
printf("%s",message);
	bzero(reply,40);
	fgets(reply,39,stdin);
   send(sockfd,reply,40,0);
   goto me;

return 0;
}