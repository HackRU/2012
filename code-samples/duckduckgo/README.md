# DuckDuckGo API

[DuckDuckGo](http://www.duckduckgo.com)

[API](http://duckduckgo.com/api.html)

[Goodies](http://duckduckgo.com/goodies.html)

## Definining words:
[define baby](http://duckduckgo.com/?q=define+baby)

## Categories:
[Simpsons Characters](http://duckduckgo.com/?q=simpsons+characters)

## Parameters:
q: query

format: output format (json or xml)

	If format=='json', you can also pass:
	
   		callback: function to callback (JSONP format)
   		
   		pretty: 1 to make JSON look pretty (like JSONView for Chrome/Firefox)
   		
   no\_redirect: 1 to skip HTTP redirects (for !bang commands).
   
   no\_html: 1 to remove HTML from text, e.g. bold and italics.
   
   skip\_disambig: 1 to skip disambiguation (D) Type.
   


## Define Sample Code
Requires curl, requests, and json
Run it as:
	define hackathon
	hackathon - A planned hacking run that is intended to last for about a week with lots of hackers.
