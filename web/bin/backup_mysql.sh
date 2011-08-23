#!bin/bash
#Back up a Mysql Database

#######################
#Database Configuration
#######################
SOURCE_DATABASE=vgdesk_dev
TARGET_DATABASE=vgdesk_dev
LOCAL_HOST=localhost
LOCAL_USER=root
REMOTE_HOST=sql.vgdesk.org
REMOTE_USER=vgdev
TEMP_FILE=dump.txt

#Dump Local Database Into Temp File
echo "Enter Local Password"
echo "USE $TARGET_DATABASE;" >> $TEMP_FILE
mysqldump -h $LOCAL_HOST -u $LOCAL_USER -p --add-drop-table $SOURCE_DATABASE >> $TEMP_FILE

#Update the Remote Database
echo "Enter Remote Password"
mysql -h $REMOTE_HOST -u $REMOTE_USER -p -e "source $TEMP_FILE"
rm $TEMP_FILE

echo "Done."