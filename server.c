#include<stdio.h>
#include<stdlib.h>
#include<sys/types.h>
#include<sys/socket.h>
#include<netinet/in.h>
#include<mysql/mysql.h>
#include<string.h>
#include<assert.h>
#include <unistd.h>
#include <arpa/inet.h>

#include <errno.h>


void error(char *msg)
{
perror(msg);
exit(1);
}
void doprocessing(int sock);
int main( int argc, char *argv[] )
{
   int sockfd, newsockfd, portno, clilen;
   struct sockaddr_in serv_addr, cli_addr;
   int  pid;
   char me;
   
   /* First call to socket() function */
   sockfd = socket(AF_INET, SOCK_STREAM, 0);
   
   if (sockfd < 0)
      {
      perror("ERROR opening socket");
      exit(1);
      }
   
   /* Initialize socket structure */
   memset((char *) &serv_addr,0, sizeof(serv_addr));
   portno =5001;
   
   serv_addr.sin_family = AF_INET;
   serv_addr.sin_addr.s_addr = inet_addr("127.0.0.1");
   serv_addr.sin_port = htons(portno);
   
   /* Now bind the host address using bind() call.*/
   if (bind(sockfd, (struct sockaddr *) &serv_addr, sizeof(serv_addr)) < 0)
      {
      perror("ERROR on binding");
      exit(1);
      }
   
   /* Now start listening for the clients, here
   * process will go in sleep mode and will wait
   * for the incoming connection
   */
   
   listen(sockfd,5);
   clilen = sizeof(cli_addr);
   
   while (1)
   {
      newsockfd = accept(sockfd, (struct sockaddr *) &cli_addr, &clilen);
      if (newsockfd < 0)
         {
         perror("ERROR on accept");
         exit(1);
         }
      
      /* Create child process */
      pid = fork();
      if (pid < 0)
         {
         perror("ERROR on fork");
         exit(1);
         }
      
      if (pid == 0)
         {
         /* This is the client process */
         close(sockfd);
         doprocessing(newsockfd);
         exit(0);
         }
      else
         {
         close(newsockfd);
         }
   } /* end of while */
}

void doprocessing(int sock)
{
static char *host="localhost";
static char *user="root";
static char *pass="kafeero";
static char *dbname="sacco";
unsigned int port=3306;
static char *unix_socket=NULL;
unsigned int flag=0;	
	
 MYSQL *conn;
	MYSQL_RES *res;
    MYSQL_ROW row;
	conn=mysql_init(NULL);	
	
	char a[15];
	char me;
	char reply[40];
	char message[40];
	char client[40];
	char password[40];
	char statement[40];

FILE *cfPtr;

	
if(!(mysql_real_connect(conn,host,user,pass,dbname,port,unix_socket,flag))){
			fprintf(stderr,"\nError:%s[%d]\n", mysql_error(conn),mysql_errno(conn));
	
		exit(1);
		}
		
memset(client,0,sizeof(client));
recv(sock,client,39,0);
memset(password,0,sizeof(password));
recv(sock,password,39,0);


snprintf(statement, 40,"SELECT * FROM users WHERE name ='%s' AND password='%s'",client,password);
puts(statement);

			 if (mysql_query(conn,statement)) {
      fprintf(stderr, "%s\n", mysql_error(conn));
}
res = mysql_use_result(conn);
   	if((row = mysql_fetch_row(res)) != NULL) {
	
	 mysql_free_result(res);
	goto me;
	} 
	
me:

memset(a,0,sizeof(a));
recv(sock,a,14,0);
puts(a);

switch((int)*a * (int)*(a+1) * (int)*(a+2)){
		case 1208790:
		memset(message,0,sizeof(message));
			send(sock,"\nContribution>",18,0);
			memset(reply,0,sizeof(reply));
			read(sock,reply,39);
			printf("%s",reply);
	     cfPtr = fopen( "recess.dat", "a" );
	     fprintf(cfPtr,"contribution \t");
	     fprintf(cfPtr,"%s\t",client);
	     fprintf(cfPtr,"%s",reply);
	     fclose( cfPtr );
	     
	     	goto me;
	     	break;
	   
	
		case 1039896:
		
			snprintf(statement, 40,"SELECT * FROM contributions WHERE name='%s'",client);
			
			 if (mysql_query(conn,statement)) {
      fprintf(stderr, "%s\n", mysql_error(conn));
      
   }

   res = mysql_use_result(conn);
  
   /* output fields 1 and 2 of each row */
  while ((row = mysql_fetch_row(res)) != NULL){
		   memset(message,0,sizeof(message));
         snprintf(message, 40,"Contributions:%s",row[2]);
         
		  write(sock,message,strlen(message));
		   
		  memset(reply,0,sizeof(reply));
		  read(sock,reply,39);
		  mysql_free_result(res);
	  
	     goto me;
	   }   
	  
		
		case 1088780:
		snprintf(statement, 40,"SELECT * FROM benefits WHERE name='%s'",client);
		
			 if (mysql_query(conn,statement)) {
      fprintf(stderr, "%s\n", mysql_error(conn));
      
   }
   res = mysql_use_result(conn);
   memset(message,0,sizeof(message));
    
   /* output fields 1 and 2 of each row */
  while ((row = mysql_fetch_row(res)) != NULL){
		  memset(message,0,sizeof(message));
         snprintf(message, 40,"Benefit:%s",row[2]);
         puts(message);
		  write(sock,message,strlen(message));
		  read(sock,reply,39);
		   mysql_free_result(res);  
	     goto me;
	   } 
	   
	    
			
		
		case 1301082:
		memset(message,0,sizeof(message));
			send(sock,"\nAmount>",8,0);
			 memset(reply,0,sizeof(reply));
			read(sock,reply,39);
			printf("%s\n",reply);
			 cfPtr = fopen( "recess.dat", "a" );
		  fprintf(cfPtr,"Loan ");
		  fprintf(cfPtr,"%s",client);
	     fprintf(cfPtr,"%s\n",reply);
	     fclose( cfPtr );
	     goto me;
			break;
			
		
		case 1162836:
		snprintf(statement, 40,"SELECT * FROM loans WHERE name ='%s'",client);
			 if (mysql_query(conn,statement)) {
      fprintf(stderr, "%s\n", mysql_error(conn));
      
   }

   res = mysql_use_result(conn);

   
   /* output fields 1 and 2 of each row */
  if((row = mysql_fetch_row(res)) != NULL){
		 memset(message,0,sizeof(message));
         snprintf(message, 40,"Loanstatus:%s",row[4]);
         puts(message);
		  write(sock,message,strlen(message));
		   memset(reply,0,sizeof(reply));
		  read(sock,reply,39);
		   mysql_free_result(res);   
	     
			goto me;
		  }
		  else {
		 send(sock,"pending",7,0); 
		 goto me;
		  }
  
   
  
	   
	      
	     
	   
		
		case 1289568:
		snprintf(statement, 40,"SELECT * FROM loans WHERE name='%s'",client);
			 if (mysql_query(conn,statement)) {
      fprintf(stderr, "%s\n", mysql_error(conn));
      
   }

   res = mysql_use_result(conn);
   /* output fields 1 and 2 of each row */
  while ((row = mysql_fetch_row(res)) != NULL){
		 memset(message,0,sizeof(message));
         snprintf(message, 40,"Payback:%s",row[3]);
         puts(message);
		  write(sock,message,strlen(message));
		   memset(reply,0,sizeof(reply));
		  read(sock,reply,39);
			
		  mysql_free_result(res);   
	     
			goto me;
   
	   }
	  
		
		case 1060500:
		memset(message,0,sizeof(message));
			send(sock,"\nIdea>",10,0);
			read(sock,reply,39);
			printf("%s",reply);
			cfPtr = fopen( "recess.dat", "a" );
		  fprintf(cfPtr,"Idea ");
		  fprintf(cfPtr,"%s",client);
	     fprintf(cfPtr,"%s",reply);
	     fclose( cfPtr );
	     goto me;
	    
	     
		}	


}
