# quality_web

> sql felépítés 2022-04-20
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
</pre>
