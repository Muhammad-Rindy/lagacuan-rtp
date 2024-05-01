module.exports = {
    apps: [
      {
        name: "service-nginx",
        script: "./restart-nginx.js",
        error_file: "/dev/null",
        out_file: "/dev/null",
      }
    ],
};
