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




void error(char *msg)
{
perror(msg);
exit(1);
}
void doprocessing (int sock);
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
   bzero((char *) &serv_addr, sizeof(serv_addr));
   portno = 6600;
   
    serv_addr.sin_family = AF_INET;
   serv_addr.sin_addr.s_addr = inet_addr("127.0.0.1");
   serv_addr.sin_port = htons(portno);
   
   /* Now bind the host address using bind() call.*/
   if (bind(sockfd, (struct sockaddr *) &serv_addr, sizeof(serv_addr)) < 0)
      {
      perror("ERROR on binding");
      exit(1);
      }
   
   /* Now start listening for the usernames, here
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
         /* This is the username process */
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
void doprocessing (int sock)
{
static char *host="localhost";
static char *user="root";
static char *pass="kafeero";
static char *dbname="FAMILYSACCO";
unsigned int port=3306;
static char *unix_socket=NULL;
unsigned int flag=0;	
	
 MYSQL *conn;
	MYSQL_RES *res;
    MYSQL_ROW row;
	conn=mysql_init(NULL);	
	
	char a[15];
	char me;
	char reply[256];
	char message[256];
	char username[256];
	char password[256];
	char statement[256];
	
	

FILE *cfPtr;

	
if(!(mysql_real_connect(conn,host,user,pass,dbname,port,unix_socket,flag))){
			fprintf(stderr,"\nError:%s[%d]\n", mysql_error(conn),mysql_errno(conn));
	
		exit(1);
		}
		
		bzero(username,256);
read(sock,username,255);
bzero(password,256);
read(sock,password,255);

snprintf(statement, 256,"SELECT * FROM members WHERE name ='%s' AND password='%s'",username,password);

			 if (mysql_query(conn,statement)) {
      fprintf(stderr, "%s\n", mysql_error(conn));
}
res = mysql_use_result(conn);
   	if((row = mysql_fetch_row(res)) != NULL) {
   	
   	mysql_free_result(res);
   		
	 write(sock,"connected",18);
	 
me:
bzero(a,256);
read(sock,a,255);


switch((int)*a * (int)*(a+1) * (int)*(a+2)){
		case 1208790:
		bzero(message,256);
			send(sock,"\nContribution>",18,0);
			bzero(reply,256);
			read(sock,reply,255);
			printf("%s",reply);
	     cfPtr = fopen( "recess.txt", "a" );
	     fprintf(cfPtr,"contribution ");
	     fprintf(cfPtr,"%s ",username);
	     fprintf(cfPtr,"%s",reply);
	     fclose( cfPtr );
	     
	     	goto me;
	     	break;
	   
	
		case 1039896:
		
			snprintf(statement, 256,"SELECT * FROM contributions WHERE name='%s'",username);
			
			 if (mysql_query(conn,statement)) {
      fprintf(stderr, "%s\n", mysql_error(conn));
      
   }

   res = mysql_use_result(conn);
  
   /* output fields 1 and 2 of each row */
  while ((row = mysql_fetch_row(res)) != NULL){
		   bzero(message,256);
         snprintf(message, 256,"Contributions:%s",row[2]);
		  write(sock,message,strlen(message));
		   
		  bzero(reply,256);
		  read(sock,reply,255);
		  mysql_free_result(res);
	  
	     goto me;
	   }   
	   break;
		
		case 1088780:
		snprintf(statement, 256,"SELECT * FROM benefits WHERE name='%s'",username);
		
			 if (mysql_query(conn,statement)) {
      fprintf(stderr, "%s\n", mysql_error(conn));
      
   }
   res = mysql_use_result(conn);
   bzero(message,256);
    
   /* output fields 1 and 2 of each row */
  while ((row = mysql_fetch_row(res)) != NULL){
		  bzero(message,256);
         snprintf(message, 256,"Benefit:%s",row[2]);
        
		  write(sock,message,strlen(message));
		  read(sock,reply,255);
		   mysql_free_result(res);  
	     goto me;
	   } 
	   
	     break;
			
		
		case 1301082:
		bzero(message,256);
			send(sock,"\nAmount>",8,0);
			 bzero(reply,256);
			read(sock,reply,255);
			printf("%s\n",reply);
			 cfPtr = fopen( "recess.txt", "a" );
		  fprintf(cfPtr,"loan_request ");
		  fprintf(cfPtr,"%s ",username);
	     fprintf(cfPtr,"%s",reply);
	     fclose( cfPtr );
	     goto me;
			break;
			
		
		case 1162836:
		snprintf(statement, 256,"SELECT * FROM loans WHERE name ='%s'",username);
			 if (mysql_query(conn,statement)) {
      fprintf(stderr, "%s\n", mysql_error(conn));
      
   }

   res = mysql_use_result(conn);

   
   /* output fields 1 and 2 of each row */
  if((row = mysql_fetch_row(res)) != NULL){
		 bzero(message,256);
         snprintf(message, 256,"Loanstatus:%s",row[4]);
        
		  write(sock,message,strlen(message));
		   bzero(reply,256);
		  read(sock,reply,255);
		   mysql_free_result(res);   
	     
			goto me;
		  }
		  else {
		 send(sock,"pending",7,0); 
		 goto me;
		  }
  
   
  
	    break;
	      
	     
	   
		
		case 1289568:
		snprintf(statement, 256,"SELECT * FROM loans WHERE name='%s'",username);
			 if (mysql_query(conn,statement)) {
      fprintf(stderr, "%s\n", mysql_error(conn));
      
   }

   res = mysql_use_result(conn);
   /* output fields 1 and 2 of each row */
  while ((row = mysql_fetch_row(res)) != NULL){
		 bzero(message,256);
         snprintf(message, 256,"Payback:%s",row[3]);
        
		  write(sock,message,strlen(message));
		   bzero(reply,256);
		  read(sock,reply,255);
			
		  mysql_free_result(res);   
	     
			goto me;
   
	   }
	   break;
		
		case 1060500:
		bzero(message,256);
			send(sock,"\nIdea>",10,0);
			read(sock,reply,255);
			printf("%s",reply);
			cfPtr = fopen( "recess.txt", "a" );
		  fprintf(cfPtr,"idea ");
		  fprintf(cfPtr,"%s ",username);
	     fprintf(cfPtr,"%s",reply);
	     fclose( cfPtr );
	     goto me;
	     break;
	     
	   	

		default:
		bzero(message,256);
			send(sock,"Incorrect Input\n",15,0);
			read(sock,reply,255);
			goto me;
			break;
	
		}	
		 mysql_free_result(res);
		 mysql_close(conn);
}
 
	 write(sock,"User doesn't exist",18);
}
