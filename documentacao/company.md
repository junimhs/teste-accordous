# Cadastrar empresas

**URL** : `/api/company/`

**Method** : `POST`

**Precisa esta autenticado** : Não

**Dados necessarios**

```json
{
    "name": "[obrigatório, unico]",
    "phone": "[obrigatório, unico]",
    "address": "[obrigatório]",
    "cep": "[obrigatório]",
    "cnpj": "[obrigatório]"
}
```

**Dados de exemplo**

```json
{
    "name": "Company 2",
    "phone": "62982296414",
    "address": "Rua J42",
    "cep": "74952310",
    "cnpj": "64012311000154"
}
```

## Success Response

**Code** : `200 OK`

**Content example**

```json
{
    "name": "Company 2",
    "phone": "62982296414",
    "address": "Rua J42",
    "cep": "74952310",
    "cnpj": "64012311000154",
    "id": "9c78d601-7377-4e5d-85dd-43523729e40c",
    "url": "company2",
    "updated_at": "2020-06-18 16:41:41",
    "created_at": "2020-06-18 16:41:41"
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
          "The name has already been taken."
        ],
        "phone": [
          "The phone has already been taken."
        ],
        "cnpj": [
          "The cnpj field is required."
        ]
      }
}
```
