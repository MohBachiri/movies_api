
# Movies/series api

**Base URL:** `https://testapimovies.000webhostapp.com`

## Endpoints

### create new  user
* URL: `/api/auth/registration`
* Method: `POST`
* Form Params
    * `username`: string
    * `password`: (min:8)
 * Response:
    * filed :: json(['errors','status'=>"forbidden"], 403)
    * success :: json(['access_token','messages','status','token_type'], 200)
   

### login  user
* URL: `/api/auth/login`
* Method: `POST`
* Form Params
    * `username`: string
    * `password`:  (min:8)
* Response:
    * filed (error validation):: json(['errors','status'=>"forbidden"], 403)
    * filed (error Unauthorized):: json(['message','status'], 401)
    * success :: json(['access_token','status','token_type'], 200)

### Update movie information
* URL: `/:movieId`
* Method: `PUT`
* Form Params
    * `title`: string
    * `genre`: string
    * `synopsis`: text
    * `image`: image (mimes: `jpg, jpeg, png`, optional, min: 1Kb, max: 10Mb)

### Delete a movie resource
* URL: `/:movieId`
* Method: `DELETE`
* Params
    * `movieId`: integer



