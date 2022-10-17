# BOM Checker v1.0

![Main Screen](https://github.com/Wold0110/BOM-Checker/blob/main/web/bom/img/main_screen.png?raw=true)

## Containers
> website               - from apache2 with php,php-mysqli  
> mysql(compose)        - not exposed to public  
> phpmyadmin(compose)   - port 81
---

## Database login
> username: quality  
> password: Qu4l1ty  
> sql dump: [SQL DataDump](https://github.com/Wold0110/BOM-Checker/blob/main/sql_dump/data_dump.sql)
---

## [C# Tool to upload BOM](https://github.com/Wold0110/BOM-Uploader)
## SQL Setup 2022-05-20
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
