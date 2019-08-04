# networking

The nc (or netcat) utility is used for just about anything under the sun involving TCP or UDP. It can open TCP connections, send UDP packets, listen on arbitrary TCP and UDP ports, do port scanning, and deal with both IPv4 and IPv6. Unlike telnet(1), nc scripts nicely, and separates error messages onto standard error instead of sending them to standard output, as telnet(1) does with some.

nc localhost 8000

The socket is a duplex stream which means it is an event emitter so we can listen to data event on the socket.


curl -i  localhost:8000

Streaming vs buffering

End request before ending 


openssl req -x509 -newkey rsa:4096 -keyout key.pem -out cert.pem -nodes

Do async if the task is a lot or will take a lot time 

 ab -c200 -t10 http://localhost:8000/ for apache concurrent connections