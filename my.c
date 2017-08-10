#include<stdio.h>
#include<string.h>
#include<sys/types.h>
#include<sys/socket.h>
#include<netinet/in.h>
#include<stdlib.h>
#include<netdb.h>
#include <unistd.h>
#include <arpa/inet.h>


#define STRINGMAX 1000   /*Maximium input size is 1000 characters*/

char* deblank(char* input)                                         
{
    int i,j;
    char *output=input;
    for (i = 0, j = 0; i<strlen(input); i++,j++)          
    {
        if (input[i]!=' ')                           
            output[j]=input[i];                     
        else
            j--;                                     
    }
    output[j]=0;
    return output;
}                             
void error(char *msg)
{
perror(msg);
exit(1);
}

int main(int argc,char *argv[]){
 char input[STRINGMAX];
int sockfd,portno;
struct sockaddr_in server;
char a[15];
	char *t;
	char *w;
	char message[256];
   char reply[256];
   char client[20];
   char password[256];
   char logins[256];



portno =6600;
   
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
      perror("ERROR connecting");
      exit(1);
   }
	
   printf("Username> ");
    fgets(client, STRINGMAX, stdin);                                         /* Read up to 1000 characters from stdin */
        client[strlen(client) - 1] = '\0';
       t=deblank(client);
       
    write(sockfd,t,strlen(t));
   
   printf("Password> ");

fgets(password,STRINGMAX, stdin); 
      password[strlen(password) - 1] = '\0';
       w=deblank(password);  
   write(sockfd,w,strlen(w));
   
   read(sockfd,logins,255);
   if(logins=="invalid") {
   	perror("User invalid");
   	close(sockfd);
   	exit(1);
   }
   else if(logins>0) {
   printf("Welcome %s",client);
   goto me;
   }
   
	me:
	printf("\n\nFAMILY SACCO SYSTEM\n");
	printf("\t\t\t\tHELP MENU\n");
	printf("\t\t\t---------------------\n");
	printf("ENTER A COMMAND OF YOUR CHOICE FROM ABOVE\n");
	printf("-Contribution\n-CheckContribution\n-BenefitCheck\n-Requestloan\n-LoanStatus\n-RepaymentDetails\n-Idea\n");
	bzero(a,256);
	fgets(a,255,stdin);
   write(sockfd,a,strlen(a));
	
read(sockfd,message,255);
printf("%s",message);
	bzero(reply,256);
	fgets(reply,255,stdin);
   write(sockfd,reply,strlen(reply));
   goto me;

return 0;
}