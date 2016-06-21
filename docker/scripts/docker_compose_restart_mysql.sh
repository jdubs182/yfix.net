srv="mysql"
dco="docker-compose"
$dco kill $srv && $dco rm -avf $srv && $dco up -d $srv && $dco logs $srv && $dco ps $srv