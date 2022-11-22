## Before jump into into the tutorial ,let me clear few things first.
- I am using a Windows 10 machine with Xampp Server installed.
- You need to install Composer- It is a Dependency Manager for PHP. You have to install it in your xampp path.
##### So if you have already install all the required step up correctly, then start run this Laravel Project.
- Pull project from git provider. https://github.com/mahehasan/linkstaff-app.git
- Open the console and cd your project root directory
- Run `composer install` Or `composer update`
- Run `php artisan migrate`
- Run `php artisan serve`
#### Test Register REST API
   ![image](https://user-images.githubusercontent.com/5804741/203244300-8c90c496-e6c1-4137-920c-a4afe257e8c6.png)
#### Test Login API
   ![image](https://user-images.githubusercontent.com/5804741/203244929-4b5449c2-d299-420e-a8bd-b05ec902fdf0.png)
#### Set Authorization Token
    Get into the Insomnia app’s Auth tab, select ‘Bearer Token’ from the Type dropdown, then add the auth token that you got when logged into the app.
   ![image](https://user-images.githubusercontent.com/5804741/203246434-a82274b4-a979-4147-8efd-5cd0f6b2e18f.png)
#### Test page/create REST API
   ![image](https://user-images.githubusercontent.com/5804741/203246824-d21604e9-f7ca-4186-af3e-07138b37fe03.png)
#### Test person/attach-post REST API
   ![image](https://user-images.githubusercontent.com/5804741/203247171-27bf6d3f-2464-4692-bc64-44ecbf0c6ef7.png)
#### Test page/{pageId}/attach-post REST API
   ![image](https://user-images.githubusercontent.com/5804741/203247381-9cf896d7-0793-4d94-b939-16a95c8752de.png)
#### Test follow/person/{personId} REST API
   ![image](https://user-images.githubusercontent.com/5804741/203248034-e02ecb07-eeaa-48ab-b38a-97c45b2b7039.png)

   
