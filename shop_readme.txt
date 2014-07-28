in wordpress, make a category called: 'Shop', remember the cat id

edit functions.php to exclude the shop items from regular website (replace id with the correct one, found above.) 

create the following pages: about (assign template single empty), collection (template shop collection), shop (assigne template all items)

copy the files to your theme dir (fonts, images, css, and php)

copy the single page template plugin to your plugin dir, activate in wordpress

copy the eshop plugin and activate (and setup shipping rates, gateways blabla)

create the eshop pages (shopping cart etc), give them custom template: 'shop empty page'

each item you want to sell is a post, assign the category Shop to these posts and the custom single post template 'Aai Shop Single'

for adding images to your collection, instead of JUST uploading images to a post, you have to INSERT them, thus designing the collection page inside of wordpress' backend.	



BUGS:
- manually hide shop posts from main page

- fieldset in first media query is outside…is this correct? 


-FOR EVERY NEW SHOP POST YOU SHOULD UPLOAD IMAGE AGAIN! (inserting into post doesnt work!)