# BOM Checker v2.0

![Main Screen](https://github.com/Wold0110/BOM-Checker/blob/main/web/bom/img/main_screen.png?raw=true)

## How to run
** Database is 
`docker run -p *your_port*:80 -e TZ=*your_timezone* bomchecker`

## Database login
> username: quality  
> password: Qu4l1ty  
---

## [C# Tool to upload BOM](https://github.com/Wold0110/BOM-Uploader)
## SQL Setup 2022-11-15 TODO: update
<pre>
products
    id          -   int
    name        -   text
    ref-        -   text
part_types
    id          -   int
    name        -   text
bom
    product_id  -   int
    part_type   -   int
    part_name   -   text
timestamps
    product_id  -   int
    timestamp   -   datetime
    operator    -   int
    
operator
    id          -   int
    name        -   text
</pre>
