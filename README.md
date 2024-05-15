execute `rm -rf ./static`
Use docker cli to get into the container and run

```shell
./php2html . ./static -ed node_modules -ed samples/mechatronics -ed samples/projectx
./php2html ./samples/mechatronics ./static/samples/mechatronics
./php2html ./samples/projectx ./static/samples/projectx
```

execute

```shell
cp ./js ./static/js -r
cp ./img ./static/img -r
cp ./images ./static/images -r
cp ./galleries/pix ./static/galleries/pix -r
```

commit and push
execute deploy script `npm run deploy`
