# Integrate Mongodb with CI
	
## Step 1. Run the following command 
		sudo apt-key adv --keyserver hkp://keyserver.ubuntu.com:80 --recv 7F0CEB10

		echo 'deb http://downloads-distro.mongodb.org/repo/ubuntu-upstart dist 10gen' | sudo tee /etc/apt/sources.list.d/mongodb.list

		sudo apt-get update

		apt-get install mongodb-10gen = 2.2.3

		sudo service mongodb restart

		mongo


## Step 1. Install Mongodb php driver to connect mongodb from php code.

		$ sudo apt-get install php5-dev php-pear php5-mongo

		$ sudo pecl install mongo

		$ sudo echo "extension=mongo.so" >> /etc/php5/apache2/php.ini

		$ sudo service apache2 restart

#### now you are ready to work on mongo db.







1. Create Database or use database.
	use DATABASE_NAME

2. Create Collection. 
	db.createCollection("COLLECTION_NAME")

3. Show list of collection. 
	show collections

4. insert document into collection.
	db.COLLECTION_NAME.insert({"KEY": "VALUE","KEY": "VALUE","KEY": "VALUE"}) 

5. update document into collection.
	db.COLLECTION_NAME.update({where Condidtion},{set data})
	db.COLLECTION_NAME.update({"key":"value"},{"KEY": "VALUE","KEY": "VALUE","KEY": "VALUE"})

6. delete document's all detail.
	db.COLLECTION_NAME.remove()

7. delete document with serach criterial
	db.COLLECTION_NAME.remoove({Search Criteria})

8. delete document by limit 1 
	db.COLLECTION_NAME.remoove({Search Criteria},1)

9. Feach all document 
	db.COLLECTION_NAME.find()

10. Feach document with where condition 
	db.COLLECTION_NAME.find({Search Criteria})

11. Feach document with limit
	db.COLLECTION_NAME.find().limit(LIMIT_NUMBER)

12. Display document with sort 
	db.COLLECTION_NAME.find().sort({KEY:1}) 
	1 for ascending order and -1 for descending order

13. Aggregate method group by with Sum 
	db.COLLECTION_NAME.aggregate([{$group: {_id : "$FIELD_NAME",num_country: {$sum:1}}}])

14. Get count of document
	db.COLLECTION_NAME.find().count()

15. indexing
	db.emp.ensureIndex({"key":1})
	1 => 'in accending order' or -1=> 'in decending order' 



