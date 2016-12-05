#!/bin/bash


error(){
code=$1

  case $code in
       1)
         echo ""
	;;
       2)
         echo ""
	;;
       3)
         echo ""
	;;
       *)
         echo ""
  esac
}

vBeta1()
{
 echo $#

}

vBeta2(){
 echo $#

}



main()
{
code=0
updateBasePath=./sql/update/
dbFileName=db.sh
newVersion=0.3.0

source configuration

if [ -f ${versionFile} ] then
  currentVersion=$(head -n 1 ${versionFile})
else
  currentVersion=0.0.0
fi

echo $currentVersion


again=true
while $again
do
  then
    case $currentVersion in
      0.0.0)
        updateFile="${updateBasePath}${currentVersion}/${dbFileName}"
        if [ -f ${updateFile} ]
        then
          source $updateFile
          #update $dbuser $dbname
          again=false
        then
          code=1
        fi
        ;;
      0.1.0)
        currentVersion=0.2.0
        updateFile="${updateBasePath}${currentVersion}/${dbFileName}"
        if [ -f ${updateFile} ]
        then
          source $updateFile
          #update $dbuser $dbname
          again=false
        then
          code=1
        fi
        ;;
      *)
        code=1
        again=false
    esac
done

error ${code}
return ${code}
}


main
