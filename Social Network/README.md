Database: social
3 tables:
- Usuarios: Stores user info (id,nick)
- Mensajes: Stores Messages (id_usuario,mensaje,fecha)
- Fans: Represents the follower/following relationship (id_usuario,id_sigue)

A User's session is managed with cookies, and their ID is stored in a cookie named userID
