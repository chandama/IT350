#!/usr/bin/python

import SimpleHTTPServer
import SocketServer
import urlparse

class MyHandler(SimpleHTTPServer.SimpleHTTPRequestHandler):
    def do_GET(self):
        if  (self.path.find('/chat.html?') != -1):
            url = self.path #Get the current URL
            par = dict(urlparse.parse_qsl(urlparse.urlparse(url).query)) #Parses the URL after the ?
            user = par['name'] #Sets the user variable = value after "name=" in the URL
            message = par['line'] #Sets message variable to value after "message=" in URL
            #Append to data.txt
            data = open('data.txt', 'a') #Open the data.txt file
            data.write('<p>%s: %s</p>'% (user, message)) #Write the variables in <p> tags in the .txt file
            data.close() #Close the .txt file

        #branch for cat chatroom
        elif  (self.path.find('/cat.html?') != -1):
            url = self.path
            par = dict(urlparse.parse_qsl(urlparse.urlparse(url).query))
            user = par['name']
            message = par['line']
            #Append to cat.txt
            data = open('cat.txt', 'a')
            data.write('<p>%s: %s</p>'% (user, message))
            data.close()

        #branch for lol lolroom
        elif  (self.path.find('/lol.html?') != -1):
            url = self.path
            par = dict(urlparse.parse_qsl(urlparse.urlparse(url).query))
            user = par['name']
            message = par['line']
            #Append to lol.txt
            data = open('lol.txt', 'a')
            data.write('<p>%s: %s</p>'% (user, message))
            data.close()

        elif  (self.path.find('/zen.html?') != -1):
            url = self.path
            par = dict(urlparse.parse_qsl(urlparse.urlparse(url).query))
            user = par['name']
            message = par['line']
            #Append to zen.txt
            data = open('zen.txt', 'a')
            data.write('<p>%s: %s</p>'% (user, message))
            data.close()

        elif (self.path.find('/CHAT?') != -1):
            url = self.path
            par = urlparse.parse_qs(urlparse.urlparse(url).query)
            user = par['name']
            message = par['line']
            #Append to data.txt
            data = open('data.txt', 'a')
            data.write('<p>%s: %s</p>'% (user, message))
            data.close()
            self.send_response(301)
            self.send_header('Location','/chat.html')
            self.end_headers()

        elif self.path.find('/CHAT?') != -1:
            self.send_response(301)
            self.send_header('Location','/chat.html')
            self.end_headers()
            print("Test 3")
            return

        return SimpleHTTPServer.SimpleHTTPRequestHandler.do_GET(self)

if __name__=="__main__":
    PORT = 9020
    Handler = MyHandler
    server = SocketServer.TCPServer(('',PORT),Handler)
    print("Serving on port: ", PORT)
    try:
        server.serve_forever()
    except KeyboardInterrupt:
        print("SERVER STOPPED!")
        server.socket.close()