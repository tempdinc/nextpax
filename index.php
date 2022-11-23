<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://supply.nextpax.app/auth/realms/supply-api-sandbox/protocol/openid-connect/token',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => 'client_id=client_sandbox_SATPD&client_secret=4c74461f-e5d1-4869-ab32-81c40dff626e&grant_type=client_credentials',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/x-www-form-urlencoded'
  ),
));


$response = curl_exec($curl);
curl_close($curl);
$response = json_decode($response);
$access_token = 'Bearer ' . $response->access_token;

echo $access_token . PHP_EOL;

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://supply.nextpax.app/api/v1/content/properties',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_HEADER => 1,
  CURLOPT_POSTFIELDS => '{
    "supplierPropertyId": "su-28856792ff2d",
    "propertyManager": "SAAPI000002",
    "parentId": "4efe8757-1f28-4d7f-b94b-6bd0dc8812e7",
    "general": {
        "minOccupancy": 2,
        "address": {
            "apt": "Apartment",
            "city": "Amsterdam",
            "countryCode": "NL",
            "street": "P.J. Oudweg",
            "postalCode": "1314CH",
            "state": "WS",
            "region": "Florida"
        },
        "checkInOutTimes": {
            "checkInFrom": "14:00",
            "checkInUntil": "22:00",
            "checkOutFrom": "06:00",
            "checkOutUntil": "11:00"
        },
        "classification": "unit_type",
        "licenseCode": "LIC981",
        "licenseDate": "2021-10-20",
        "baseCurrency": "EUR",
        "typeCode": "TYP001",
        "geoLocation": {
            "latitude": 2.31,
            "longitude": 5.64
        },
        "maxPets": 6,
        "name": "The Name",
        "maxAdults": 6,
        "maxOccupancy": 6
    },
    "fees": [
        {
            "feeCode": "RES",
            "chargeType": "MAN",
            "chargeMode": "STA",
            "currency": "EUR",
            "fromDate": "2032-10-01",
            "untilDate": "2032-10-06",
            "amountFlat": 300,
            "isTaxable": true,
            "applicableTaxPerc": 25.33,
            "includedChannels": [
                "KAY380"
            ]
        }
    ],
    "taxes": [
        {
            "taxCode": "VAT",
            "fromDate": "2032-10-01",
            "untilDate": "2032-10-06",
            "amountPercentage": 25.33,
            "rentIncluded": true,
            "excludedChannels": [
                "KAY380"
            ]
        }
    ],
    "images": [
        {
            "typeCode": "exterior",
            "url": "http://image1.url",
            "displayPriority": 0,
            "caption": "image 1 description",
            "lastUpdated": "2012-10-06"
        },
        {
            "typeCode": "house",
            "url": "http://image2.url",
            "displayPriority": 1,
            "lastUpdated": "2012-10-06"
        }
    ],
    "nearestPlaces": [
        {
            "typeCode": "DAR",
            "distance": {
                "feet": 300
            }
        },
        {
            "typeCode": "BUS",
            "distance": {
                "meters": 110
            }
        }
    ],
    "amenities": [
        {
            "typeCode": "A19",
            "attributes": [
                "Y",
                "E"
            ]
        },
        {
            "typeCode": "A05",
            "attributes": []
        }
    ],
    "descriptions": [
        {
            "typeCode": "house",
            "language": "EN",
            "text": "Some quite long description of this property."
        },
        {
            "typeCode": "interior",
            "language": "EN",
            "text": "Some quite long description of this property."
        }
    ],
    "subrooms": [
        {
            "typeCode": "HAL",
            "sequenceNumber": 1,
            "sizeSqMeters": 30,
            "items": [
                {
                    "itemCode": "ITM027",
                    "itemCount": 2,
                    "itemCapacity": 3
                },
                {
                    "itemCode": "ITM028",
                    "itemCount": 1,
                    "itemCapacity": 4
                }
            ]
        },
        {
            "typeCode": "BAT",
            "sequenceNumber": 2,
            "sizeSqFeet": 5,
            "items": [
                {
                    "itemCode": "ITM012",
                    "itemCount": 1,
                    "itemCapacity": 1
                },
                {
                    "itemCode": "ITM013",
                    "itemCount": 1,
                    "itemCapacity": 1
                }
            ]
        }
    ]
}',
  CURLOPT_HTTPHEADER => array(
    'Authorization: ' . $access_token,
    'Accept: application/json',
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
var_dump($response);
