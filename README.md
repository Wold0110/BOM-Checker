# BOM Checker v0.3
## BOM uploader: https://github.com/Wold0110/BOM-Uploader
## Containers
> website       - from apache2 with php,php-mysqli  
> mysql         - not exposed to public  
> phpmyadmin    - port 81
---

## Database login
> username: quality  
> password: Qu4l1ty
---

## sql felépítés 2022-04-20
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
