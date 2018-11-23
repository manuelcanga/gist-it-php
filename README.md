# gist-it-php
 An little app to embed files from a github repository like a gist
  
## Usage

Take a github file url and prefix it with a link to your app domain and embed the result within a &lt;script&gt; tag:  
  
```
<script src="http://yourAppDomain/$file"></script>
```

**$file** should follow the github repository pattern of `$user/$repository/raw/master/$path`

## References 

Based on [robertkrimen/gist-it](https://github.com/robertkrimen/gist-it) project