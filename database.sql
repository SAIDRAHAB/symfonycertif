[33mDescription:[39m
  Dump remote database

[33mUsage:[39m
  symfony.exe env:db:dump [options] [--] <file>

[33mArguments:[39m
  [32mfile[39m  The file where to dump, - for stdout [33m[default: "-"][39m [33m(required)[39m
  

[33mOptions:[39m
  [32m--project=value, -p=value[39m                   The project ID
  [32m--environment=value, -e=value, --env=value[39m  The environment ID [%SYMFONY_BRANCH%, %SYMFONY_ENVIRONMENT%]
  [32m--app=value, -A=value[39m                       The remote application name [%SYMFONY_APPLICATION_NAME%]
  [32m--worker=value[39m                              The remote worker name
  [32m--no-wait[39m                                   Do not wait for the operation to complete
  [32m--relationship=value[39m                        
  [32m--collection=value[39m                          
  [32m--gzip[39m                                      
  [32m--help, -h[39m                                  Show help
  
