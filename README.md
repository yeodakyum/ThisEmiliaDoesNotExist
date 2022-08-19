# ThisEmiliaDoesNotExist
Generates Faces of "Emilia", a charater from "Re:zero" [Try it](https://scapp.us/anime)

[Inspired by](https://github.com/taziksh/hayasaka.ai)

Using NVIDIA's StyleGAN 2 with Ada, it is possible to train with less datasets.  

## Training process
Started with [High-Resolution Anime Face Dataset (512x512)](https://www.kaggle.com/datasets/subinium/highresolution-anime-face-dataset-512x512) to pre-train the model,

Using [Grabber](https://github.com/Bionus/imgbrd-grabber) gathered ~3000 images of Emilia from Danbooru. 

Faces extracted using custom trained YOLOv5, and pruned by hand to get ~1500 images of high quality faces. All images were upscaled using [Real-ESRGAN](https://github.com/xinntao/Real-ESRGAN)
realesr-animevideov3 model and resampled to 512px squares.

Using pre-trained model, Results with fid50k=18.2 was achived within ~500kimgs 

## Results 
![fakes000272](https://user-images.githubusercontent.com/29008840/185655825-ac13ef4b-a385-4331-a687-6f01206b57ea.png)

Random samples. Result with truncation_psi = 1.0

Better, more stable images was achived with lower truncation_psi ( as <0.5) since the target dataset is not diverse. 

following is image with truncation_psi = 0.5 
![grid](https://user-images.githubusercontent.com/29008840/185657597-da7bfd90-4b11-4235-9dfe-4dd21b584405.png)


.. and with truncation_psi = 0.8 images are more diverse, but less stable. both images have same seed.
![grid](https://user-images.githubusercontent.com/29008840/185658592-7ccea5dd-a562-47a2-8478-081bb8c59bc9.png)
