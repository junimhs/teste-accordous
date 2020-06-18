# Cadastrar usuarios

**URL** : `/api/company/{urlCompany}/users`

**Method** : `POST`

**Precisa esta autenticado** : Não

**Dados necessarios**

```json
{
    "name": "[obrigatório]",
    "email": "[obrigatório, unico]",
    "password": "[obrigatório]",
}
```

**Dados de exemplo**

```json
{
    "name": "Luis Henrique",
    "email": "luis@gmail.com",
    "password": "junior"
}
```

## Success Response

**Code** : `200 OK`

**Content example**

```json
{
    "name": "Luis Henrique",
    "email": "luis@gmail.com",
    "company_id": "9c78d601-7377-4e5d-85dd-43523729e40c",
    "id": "aabef3c6-1a7d-4072-aa06-c871bc2e5b26",
    "updated_at": "2020-06-18 16:41:44",
    "created_at": "2020-06-18 16:41:44"
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
        "email": [
          "The email field is required."
        ]
      }
}
```
