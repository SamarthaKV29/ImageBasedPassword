# ImageBasedPassword
## Website: https://imagebasedpws.herokuapp.com/
## Description

This project pertains to using the Captcha as a graphical password and this repo contains the code to demo the project. We have different methods of authenticating users as shown below:

### Types
- Login basic image password:

This is a basic type of Image based passwords which is derived from CaRP which is a combination of both an Image and a password. Nowadays, this is becoming obsolete. Here we can see that the user selects a specified number of images as a password, which will be used while logging in.

<img src="https://github.com/SamarthaKV29/ImageBasedPassword/blob/master/assets/imgs/BasicIMGpwd.png" />

- Circle selection encryption: 

In this type, we use Jcrop to have the user select a circle on an image, while uploading the file. Later, while downloading, the user selects a smaller circle inside the previous selected area to authenticate.

<img src="https://github.com/SamarthaKV29/ImageBasedPassword/blob/master/assets/imgs/CirclePWD2.png" />
<img src="https://github.com/SamarthaKV29/ImageBasedPassword/blob/master/assets/imgs/CirclePWD.png" />


- Grid Based Selection:

In this type, we plot a grid over an image where the user has to select a pattern of grid cells while uploading. Later, he must use the same pattern on the grid to access the file uploaded.

<img src="https://github.com/SamarthaKV29/ImageBasedPassword/blob/master/assets/imgs/GridIMGpwd.png" />


## Stack

### WAMP

- PHP 5,
- HTML, CSS, JS
- Boostrap
