# Cadastrar fornecedores

**URL** : `/api/provider/`

**Method** : `POST`

**Precisa esta autenticado** : Não

**Dados necessarios**

```json
{
    "name": "[obrigatório]",
    "email": "[obrigatório]",
    "monthly_payment": "[obrigatório]"
}
```

**Dados de exemplo**

```json
{
    "name": "Fornecedor 1",
    "email": "fonercedor1@gmail.com",
    "monthly_payment": "500.00"
}
```

## Success Response

**Code** : `200 OK`

**Content example**

```json
{
    "name": "Fornecedor 1",
    "email": "fonercedor1@gmail.com",
    "monthly_payment": 500,
    "company_id": "9c78d601-7377-4e5d-85dd-43523729e40c",
    "id": "c07d7156-05fe-4259-bbc2-0e30d6ceb514",
    "url": "fornecedor1",
    "updated_at": "2020-06-18 16:42:00",
    "created_at": "2020-06-18 16:42:00"
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
        "name": [
          "The name field is required."
        ],
        "email": [
          "The email field is required."
        ],
        "monthly_payment": [
          "The monthly_payment field is required."
        ]
      }
}
```
