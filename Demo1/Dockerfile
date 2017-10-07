FROM ubuntu

# install software we will need
RUN apt-get update && apt-get install -y \
    autoconf \
    automake \
    git \
    gcc \
    libssl-dev \
    make

# clone project
RUN git clone https://github.com/btpd/btpd.git

WORKDIR /btpd

# build configure script
RUN aclocal && \
    autoconf && \
    automake -ac

# build project
RUN ./configure --prefix=/usr && \
    make && \
    make install
