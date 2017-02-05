# Gonzales - API edition #

This project contains REST API / UI for managing content distribution & content parts of the parent Gonzales Media Platform branch.

See http://shorties.vifi.ee for demo version of this UI.

User admin
Pass admin

### API Specification 1.1 ###


Each request must have parameters api_key and ip_address given in the GET / POST request. 

Api key is to authenticate the distributor, IP address has to provide the current IP address of the peer requesting the action.

Additional IP restrictions may apply for using the key.

Output format is provided as XML or JSON. Default is XML and can be altered by adding format=json as a request parameter.

General functions

/api/get_token				

Provides token that is used to authenticate user session.

in: 	User e-mail address / MD5 password hash (optional) to get authenticated session.
out:	token to be stored in the cookie / session and is used to identify the user later on 

example:

/api/get_token/janiluuk@gmail.com/d1f533d2e5b1cde7f2e1a2


response:
						
<response>
<status>ok</status>
<token>cc70d2615bd237053abd60b4099cdaea</token>
</response>

/api/verify_purchase	

Verifies that upcoming transaction can be processed, content exists and can be provided to the customer. Can be used to track if user never returned from the bank.


in: 	Product ID / Token / Payment method ID
out: 	Status (“ok” if system works or error code => no  sale)

example:

/api/verify_purchase/58909/8d4508e46f7899bcf7222668964cb0d5/21

example responses:

<response>
<status>ok</status>
<message/>
</response>

<response>
<status>error</status>
<message>User’s IP address is outside the allowed area for this content</message>
</response>

<response>
<status>error</status>
<message>Chosen payment method is unavailable</message>
</response>

/api/purchase			

Purchase product or increase balance for user. Reference number has to be unique for each purchase. Purchases with same reference number are joined as one transaction.

in: 	Product ID / token / Reference number / Payment method ID / Price class ID / Amount user paid (double decimal). (Optionally Email - address to assign the product for, Price class ID for the Gift)

out:	Status, Authentication code, Session ID 

example:

/api/purchase/22/8d4508e46f7899bcf7222668964cb0d5/136213833921/1/4/10.00






response:

<response>
<status>ok</status>
<authcode>8fd92f2d</authcode>
<sessionid>bca8e418e04ce118ae3e97a030de5667</sessionid>
</response>



/api/view_film

Retrieve viewing session for player

in:	Session ID
out:	Status code, Rtmp link, Timestamp of the session in seconds, URL for mobile devices (works 5 seconds after generation)

Example:

/api/view_film/bca8e418e04ce118ae3e97a030de5667

Response:

<response>
<status>ok</status>
<rtmplink>/biutiful/biutiful.mp4</rtmplink>
<timestamp>0</timestamp>
<mobileurl>
http://gonzales.vifi.ee/test/1c835a9712f1d65dbfe764592703ecd4/5170269a/biutiful.mp4
</mobileurl>
</response>




/api/update_session

Checks that session is still valid and provides notifications and other content for user session.
Sessions that have not received update for 12 minutes are considered as expired.

in:	Session ID / Timestamp of current position
out:	Status_code, Message (contains plain text or simple html which should be displayed on user notification area or other clearly visible place in the screen)


example:

/api/update_session/bca8e418e04ce118ae3e97a030de5667/10.0

response:

<response>
<status>ok</status>
<message/>
</response>

/api/sessioninfo

Check the status a session id

in: Session ID 
out: Status code, Status text

example:

/api/sessioninfo/bca8e418e04ce118ae3e97a030de5667/10.0

response:

<response>
<status>ok</status>
<message>Session is valid till 21.09.2012 and your authentication code is bbbbcca</message>
</response>

/api/authorize_film			

Authenticates new session with code provided by user

in:	Film ID, Code, E-mail or Token
out:	Status, New authcode if different, Session ID and URL for mobile content (works 5 seconds after generation)

example:

/api/authorize_film/58931/8fd92f2d/dummy%40dummy.com

response:

<response>
<status>ok</status>
<authcode>8fd92f2d</authcode>
<sessionid>20b1e11bb1954bdb34742c56f1cd25c2</sessionid>
<mobileurl>
http://gonzales.vifi.ee/test/5aab56d12cff1a526fdae7377eccec0f/5170290c/i-love-you-phillip-morris/i-love-you-phillip-morris_ee_mob.mp4
</mobileurl>
</response>


/api/resolve

A method notifying that something went wrong with purchase or other vital process to help with customer service and error reporting and possible redeem for the invalid action.



in: “info” array as POST containing url, error message and token_id, “server” as POST containing $_SERVER global for the user session.
out: status, message to show to the user.

example:

/api/resolve

response:

<response>
<status>ok</status>
<message>Error has occured with the transaction and has been notified to the maintenance, please contact 6555555 or xxx@xxx.com  for information. Try this link to try the action again: http://xxx </message>
</response>



Content actions

/api/feed

Generic feed for content and categories with simple filtering.
Takes also any film attributes as GET parameters  with following suffixes:
_min: Has to be at least
_max: Maximum value
_has: Includes value
_is: Is value

in: category name or “genres” for category list, “all” for all content, amount of films, order (asc / desc / random)

out: array of items with parameters: product id, product page for details, title, imdb rating, alternative title, price, poster url, backdrop image url, and genres

example:

/api/feed/all/1/random?imdbrating_min=6.5

response:

<movies>
<movie>
<id>59250</id>
<productpage>http://www.vifi.ee/est/filmid.m/suvi</productpage>
<title>Suvi</title>
<imdbrating>7.1</imdbrating>
<alternativetitle>Suvi</alternativetitle>
<price>2.20</price>
<poster>
http://cf2.imgobject.com/t/p/w500/eaAzD0KV4g3kB2VbDtOAySzF20u.jpg
</poster>
<backdrop>
http://gonzales.vifi.ee/files/MediaImage/poster/suvi-backdrop.jpg
</backdrop>
<genres>Draama, Komöödia, Eesti</genres>
</movie>
</movies>


/api/movies

Available movies for the distributors

in: optional GET parameter timestamp to list content only changed after that.
out: id, timestamp of modification.


example:


/api/movies?format=json&timestamp=1361953350

response:

[{"id":"59281","updated_at":1361953354},{"id":"59268","updated_at":1357399293},{"id":"59278","updated_at":1356866253},{"id":"59277","updated_at":1357399325},{"id":"59276","updated_at":1358429330}]....

/api/movie

Show all details of title.

in: id of the movie
out: array of parameters listed in the example

example:

/api/movie/59184?format=json

response:

{"id":"59184","md5":null,"title":"Vahva s\u00f5dur \u0160vejk","original_name":"The Good Soldier Shweik","alternative_name":"Vahva s\u00f5dur \u0160vejk","base_name":"the-good-soldier-shweik","parent_id":null,"author_id":"1","provider_id":"5","featured":"0","approved":"1","geo_restricted":"1","broken":null,"ean":null,"vet":null,"price":"3.00","popularity":null,"active":"1","year":"2009","agelimit":null,"comment":null,"imdb_id":"tt2217971","tmdb_id":null,"rt_id":"","price_class_id":"6","runtime":"77","overview":"T\u00e4ispikk joonisfilm Jaroslav Ha\u0161eki maailmakuulsa romaani ainetel. Stiilne ja musta huumoriga pikitud lugu esimesest maailmas\u00f5jast tavalise s\u00f5duri m\u00e4tta otsast n\u00e4htuna. Josef \u0160vejk on lihtne prahalane, kes kaubitseb hulkuvate koertega. Kuri saatus viib naiivse \u0160vejki nii hullumajja kui ka vanglasse, ent \u201epaberitega idioot\u201c ei kaota optimismi isegi siis, kui saadetakse s\u00f5jav\u00e4ljale oma keisrit teenima.<br \/>\r\n\u0160vejki absurdsetes seiklustes selle maailma v\u00e4gevate suhtes v\u00e4ljendatud satiir on paljuski aktuaalne ka t\u00e4nap\u00e4eval.<br \/>\r\nDubleeritud stuudios Industrial Productions filmistuudio Estinfilm tellimusel. N\u00e4itlejad T\u00f5nu Aav, Toomas Lasmann, Margus J\u00fcrisson, Kristi Aule, Allan Kress, Andrus Kasesalu jt. T\u00f5lkija Jaanus J\u00f5ekallas, re\u017eiss\u00f6\u00f6r Oleg Davidovitch, produtsent Mati Sepping.","tagline":”This istagline “,"created_at":"2012-11-21 14:45:49","updated_at":1355517533,"released":"2011-11-27 02:00:00","views":"132","rating":10,"imdb_rating":null,"type":"1","episode_nr":null,"imdbrating":"7.6","length_seconds":0,"profiles":[{"id":"20050"}],"price_classes":[{"id":"6"}],"fallback_price_duration":24,"fallback_price_type":1,"fallback_price":5,"name":"Vahva s\u00f5dur \u0160vejk","trailer_url":"trailer\/the-good-soldier-shweik.flv","rtmp_url":"the-good-soldier-shweik.mp4","credits":[],"language":"ee","languages_spoken":[{"id":"3"}],"countries":[{"id":"2"},{"id":"36"}],"key":"59184","subtitles":[],"images":{"posters":[{"id":"80037"}],"backdrops":[{"id":"80164"}]},"thumb":"http:\/\/gonzales.vifi.ee\/files\/MediaImage\/mid\/shweik.jpg","poster":"http:\/\/gonzales.vifi.ee\/files\/MediaImage\/poster\/shweik-backdrop.JPG","trailers":[{"id":"20003"}],"genres":[{"id":"10762"},{"id":"10776"}]}


/api/movies/simple

Returns simplified ID -> NAME list for quick search / autocomplete 

in: GET parameter “term” 
out: ID and Label for resulting items

example:

/api/movies/simple?term=valli&format=json

response:

[{"id":"59305","label":"Valli baar","value":"Valli baar"}]


Content details listings

Each provides list of id / timestamp items and method for fetching specific item. 
These are ment to use for synchronizing content to elsewhere, and should be use in conjuction with timestamp - parameter.

 Most of the items have also “deleted” attribute, which indicates that content has been removed from the backend and should not be available for use anymore. 









/api/genres 
/api/genre/<id>

Provides category listings and details for the specified genre including the related titles.


/api/tags 
/api/tag/<id>

Provides tag listings and details for the specified tag including the related titles

/api/series 
/api/serie/<id> 

Provides list of series and the seasons included in it.

/api/seasons
/api/season/<id> 

Provides list of seasons and the episodes included in it.


/api/episodes 
/api/episode/<id> 

Provides list of episodes.

/api/packages
/api/package/<id> 

List all packages from the system.

Returns following fields in response:
id, name, title, description, created_at, updated_at, released, is_deleted, price, type, price_class_id, active, featured, approved, comment, img_id, broken, geo_restricted, image, price_classes, fallback_price_duration, fallback_price_type, movies [array], 

/api/lists
/api/list/<id>
/api/listContent/<id>

Provides list of dynamic lists created in the backend category list builder view. These are used for building and automatically upholding top lists based on various terms.

/api/actors
/api/actor/<id> 

List of all the actors and other credits in the system and the movies related to them.




/api/comments
/api/comments/<id>

List all the user comments in the system and the details for the specified comment.

/api/ratings/<id>

List all the ratings in the system

/api/profiles
/api/profile/<id> 

List all the video files in the system.

profile - field indicates the quality available;

0 - Low quality 
1 - Medium quality
2 - High quality
3  - HD ready quality (720p)
4 - FullHD quality (1080p)
5 - Mobile version without  subtitles
6 - Mobile version with .EE subtitles.

/api/messages
/api/message/<id> 

List all the user messages in the system 


/api/trailers
/api/trailer/<id> 

List all the trailers in the system

/api/images
/api/image/<id> 

List all the images in the system

/api/languages
/api/language/<id>

List all the languages in the system and movies related to them

/api/countries
/api/country/<id> 
     
List all the countries in the system and the movies related to them

       

User Actions

/api/user/<token_id>

Retrieve updated data for authenticated user and updates the user session timestamp. Should be called after any kind of action regarding user information or purchases.
			
in:	token id from get_token	
out:	user profile output for synchronization:
purchase_history: 	[purchase_date, id]
active_subscriptions:	[purchase_date, id, valid_from,valid_to]
user_info:		[id, email, username, last_visit, user_level]
messages:		[id, message_date, from, message, subject, is_new]
	new_messages:	[id, message_date, from, message, subject, is_new]


/api/user/register/<email>/<md5>

Register user with the system.

in: E-mail address and MD5 hashed password
out: Status code and user id or error code

example:

/api/user/register/janiluuk@gmail.com/11a1d4b3d2f7f4ccb1d6f4ddb3e8

response:

<response>
<status>ok</status>
<userid>5155</userid>
</response>


/api/user/<email>/profile

Fetch profile information for user. 

example:
/api/user/janiluuk@gmail.com/profile

response:

<response>
<id>2484</id>
<userid>2530</userid>
<timestamp>1366318239</timestamp>
<privacy>protected</privacy>
<lastname/>
<firstname/>
<showfriends>1</showfriends>
<allowcomments>1</allowcomments>
<email>janiluuk@gmail.com</email>
<age/>
<city/>
<balance>1</balance>
<tickets>
a:1:{i:58909;a:11:{s:2:"id";s:5:"60698";s:7:"user_id";s:4:"2530";s:7:"bill_id";s:4:"7673";s:9:"auth_code";s:8:"8fd92f2d";s:9:"validfrom";s:19:"2013-04-18 19:49:30";s:7:"validto";s:19:"2013-04-25 19:49:30";s:6:"active";s:1:"1";s:10:"created_at";s:19:"2013-04-18 19:49:31";s:10:"updated_at";s:19:"2013-04-18 20:10:36";s:4:"type";s:7:"Package";s:6:"vod_id";s:5:"58909";}}
</tickets>
<purchasehistory>
</purchasehistory>
<favorites>a:0:{}</favorites>
<messages>7</messages>
<senttickets/>
<receivedgifts/>
<newsletter>0</newsletter>
<comments></comments>
<othermarketing>0</othermarketing>
<ratings>N;</ratings>
<subscription>1</subscription>
<distributorid>0</distributorid>
</response>



/api/user/<email>/resetprofile

Reset user profile removing all information

example:

/api/user/janiluuk@gmail.com/resetprofile

response:

<response>
<status>ok</status>
</response>

/api/user/<email>/purchase_history

Returns purchase history for given account

/api/user/<email>/set/<field>/<value>

Set profile value for user defined in the backend field configuration

/api/user/<email>/get/<field>

Get value for certain field from given user profile


/api/user/<email>/comments
/api/user/<email>/comment/<vod_id>
/api/user/<email>/delcomment/<vod_id>

Lists all user comments, comments on specified title and deletion of user comment.

/api/user/<email>/ratings
/api/user/<email>/rate/<vod_id>/5
/api/user/<email>/delrating/<vod_id>

Lists all user ratings, set rating for specified title (1-10) and deletion of rating for title.

/api/user/<email>/favorites
/api/user/<email>/addfavorite/<vod_id>
/api/user/<email>/delfavorite/<vod_id>
/api/user/<email>/delfavorites

Get all favourites, add title to user’s favourite list, remove favourite status for specified title and delete all favourites.

/api/user/<email>/subscribe
/api/user/<email>/unsubscribe

Subscribe / unsubscribe user to notifications.

/api/user/<email>/messages
/api/user/<email>/sendfeedback

Get all messages sent by user, and post feedback to the support. Use POST variables “message” and “subject” in conjuction with the sendfeedback action.# VOD-platform
# VOD-platform
