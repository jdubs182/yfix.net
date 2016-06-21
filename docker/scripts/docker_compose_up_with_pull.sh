dco="docker-compose"
$dco pull && $dco kill && $dco rm -avf && $dco up -d && $dco logs && $dco ps
