<?
   session_cache_limiter('private');
   $cache_limiter = session_cache_limiter();
   /* Define o limite de tempo do cache em 30 minutos */
   session_cache_expire(1);
   $cache_expire = session_cache_expire();
   
   @session_start();
?>
