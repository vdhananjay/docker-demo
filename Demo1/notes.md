# Demo 1

## Docker Hub
[ubuntu image](https://hub.docker.com/_/ubuntu/)

## Docker File
- FROM
- RUN
- WORKDIR

## Docker Build
```sh
docker build -t demo1 .
docker images
```

## Docker Run
```sh
docker run -ti demo1 bash
ps -e
```

## Run btpd
```sh
btpd
btcli list
```

## Containers Are Ephemeral
```sh
apt install curl
curl -o archlinux-2017.10.01-x86_64.iso.torrent https://www.archlinux.org/releng/releases/2017.10.01/torrent/
btcli add -d . archlinux-2017.10.01-x86_64.iso.torrent
```
