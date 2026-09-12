<?php

namespace Mini\Http

final enum Method {
  case GET;
  case POST;
  case PUT;
  case PATCH;
  case DELETE;
  case HEAD;
  case OPTIONS;
}
