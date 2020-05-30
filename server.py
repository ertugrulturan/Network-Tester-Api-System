import socket, os, sys

#Initilize Variables
buf = 0
i = 0
secretKey = "t13rpassword"

#Initilize Socket
serversocket = socket.socket(socket.AF_INET, socket.SOCK_STREAM)

#Bing Socket Server ip and port
serversocket.bind(('1.1.1.1', 81))

#Listen to Socket
serversocket.listen(5) # become a server socket, maximum 5 connections

#Output Program Title to Screen
print "220 Tester Server Controller System"

#Loop forever
while True: 
    
    #Compare buf variable and zero
    if buf != 0:
        
        if buf[:len(secretKey)] == secretKey:
            newbuf = buf.split(",")
            print "Executing: "+str(newbuf[1])
        else:
            print "Key Denied"
            print buf[:len(secretKey)] + "-" + secretKey

        os.system(str(newbuf[1]))
    buf = 0
    while True:
            connection, address = serversocket.accept()
            buf = connection.recv(128)
            if len(buf) > 0:
                    break 
