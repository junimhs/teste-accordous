# Fazer login

**URL** : `/api/sanctum/token`

**Method** : `POST`

**Precisa esta autenticado** : Não

**Dados necessarios**

```json
{
    "email": "[obrigatório]",
    "password": "[obrigatório]",
    "device_name": "[obrigatório, Necessario para indentificar de qual aparelho o usuario esta se autenticando]"
}
```

**Dados de exemplo**

```json
{
    "email": "luis@gmail.com",
    "password": "junior",
    "device_name": "mobile"
}
```

## Success Response

**Code** : `200 OK`

**Content example**

```json
{
    "token": "1|QhkuSbclCbqQ5qTSu0HSUhyGq5cDogs1wzBuWX1XYdHDs0lDjJMUzF91KGhNUiw6GovyrwQXWq3LoONt"
}
```

## Error Response

**Condition** : Se os dados forem invalidos.

**Code** : `401 UNAUTHORIZED`

**Content** :

```json
{
    "error": "Invalid data"
}
```

## Error Response

**Condition** : Se qualquer campo não for passado no json.

**Code** : `400 BAD REQUEST`

**Content** :

```json
{
    "message": "The given data was invalid.",
      "errors": {
        "device_name": [
          "The device name field is required."
        ]
      }
}
```
