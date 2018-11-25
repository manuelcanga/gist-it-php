# gist-it-php
 A little app to embed files from a github repository like a gist into your blog / website
  
## Usage

Take a github file url and prefix it with a link to your app domain and embed the result within a &lt;script&gt; tag:  
  
```
<script src="http://yourAppDomain/$file"></script>
```

**$file** should follow the github repository pattern of `$user/$repository/raw/master/$path`

## Example


```
<script src='https://gist-it-php.trasweb.net/trasweb/Team/blob/develop/Team.php'></script>
```

## Install

1. Create a subdomain in your hosting
2. Save this code in that subdomain 
3. Add script tags( see Example ) to your blog pages

## References 

Based on [robertkrimen/gist-it](https://github.com/robertkrimen/gist-it) project