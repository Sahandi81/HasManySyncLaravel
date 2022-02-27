# HasManySyncLaravel
Sync method for hasMany relations 
------------------------------------------------------------------


Do not change `HasManySyncable.php`! just copy paste it.

in class `Discount.php`, `categoryAndProducts()` its our relation.


let `hasMany()` alone and add `HasManySyncable` to your Modal. my modal its `Discount.php`.

in controller use it this way :
```
$discount->categoryAndProducts()->sync($fields['category_and_products']);
```

And here you go, We are done!
