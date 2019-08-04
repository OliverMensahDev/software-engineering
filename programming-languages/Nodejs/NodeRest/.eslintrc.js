module.exports = {
  env: {
    commonjs: true,
    es6: true,
    node: true,
  },
  extends: 'airbnb-base',
  globals: {
    Atomics: 'readonly',
    SharedArrayBuffer: 'readonly',
  },
  parserOptions: {
    ecmaVersion: 2018,
  },
  rules:  {
    'no-console': process.env.NODE_ENV === 'production' ? 2 : 0,
    'no-debugger': process.env.NODE_ENV === 'production' ? 2 : 0,    
    "indent": [
        0,
        "tab"
    ],
    "quotes": [
        2,
        "single"
    ],
    "linebreak-style": [
        2,
        "unix"
    ],
    "semi": [
        2,
        "always"
    ], 
    "comma-dangle":0
},
};
