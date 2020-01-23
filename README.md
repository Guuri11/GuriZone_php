# GuriZone - Proyecto Backend
__Notas sobre el proyecto:__
- La internacionalización la uso en una función de la clase __App\Controller\AbstractController__, y la aplico sobre el constructo, así si el usuario cambia de idioma se mantiene en el controlador en el que estaba.
- API Twitter, las claves se utilizan en config/config.php y el código se encuentra en la función crearProducto() en __App\Controller\ProductoController__, al subir un producto en la bbdd se subirá un tweet con un texto fijado(no funcionará si está capado por Generalitat xd). La cuenta es __@gzonebackend__ y es pública.
- Cuentas de usuarios:
  -Admin: admin@admin.com - admin
  -Usuario normal: usuario@usuario.com - usuario
  -Empleado: empleado@gurizone.com - empleado
  

