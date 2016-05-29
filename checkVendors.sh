#! /bin/bash

validateVendor () {
	echo "***************************";
	echo "looking vendor $1";
   	cd "$1";
  	git pull;
  	git status;
  	levels=$2;
   	for (( c=1; c<=${levels[$i]}; c++ ))
	do
	  	cd ..;
	done
  	echo "***************************";
}

files=( "vendor/flowcode/amulen-classification-bundle" "vendor/flowcode/amulen-media-bundle" "vendor/flowcode/amulen-page-bundle" "vendor/flowcode/amulen-user-bundle" "vendor/flowcode/amulen-dashboard-bundle" "vendor/flowcode/amulen-news-bundle" "vendor/flowcode/amulen-shop-bundle" "vendor/flowcode/notificationbundle"  )
levels=( 3 3 3 3 3 3 3 3 ) 


for i in "${!files[@]}"
do
   validateVendor  ${files[$i]} ${levels[$i]}
done



