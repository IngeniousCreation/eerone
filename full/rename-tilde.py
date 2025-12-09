#!/usr/bin/env python3
import os
import sys

plugins_dir = "wp-content/plugins"

for item in os.listdir(plugins_dir):
    if item.endswith("~"):
        old_path = os.path.join(plugins_dir, item)
        new_name = item.rstrip("~")
        new_path = os.path.join(plugins_dir, new_name)
        
        if os.path.exists(new_path):
            print(f"Skipping {item} - {new_name} already exists")
        else:
            os.rename(old_path, new_path)
            print(f"Renamed: {item} -> {new_name}")

print("\nDone!")

