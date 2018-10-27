var	array = [],
	members,
	sizeBlockX = 200;
	sizeBlockY = 50;
	tree = [],
	fontSize = 16,
	getMembersUrl = "http://localhost/tree/get";

function setup() {
	createCanvas(document.body.clientWidth, document.body.clientHeight);
	frameRate(10);

	$.ajax({
		url: getMembersUrl,
		success: function(value) {
			members = JSON.parse(value);
			noLoop();
			textSize(fontSize);
			var deleted = 0;
			
			for (var i = 0; i < members.length; i++) {
				if (members[i].parent_id == 0) {
					var level = 1;
					tree.push([]);
					setNewLevel(level, members[i]);
				}
			}

			for (var i = 0; i < tree.length; i++) {
				if (tree[i].length > 0) {
					var coords = getCoords(tree[i].length, i + 1);

					for (var j = 0; j < coords.length; j++) {
						tree[i][j].x = coords[j][0];
						tree[i][j].y = coords[j][1];
					}
				}
			}
		}
	});
}

function draw() {
	textAlign(CENTER);

	for (var i = 0; i < tree.length; i++) {
		for (var j = 0; j < tree[i].length; j++) {
			fill(255);
			rect(tree[i][j].x, tree[i][j].y, sizeBlockX, sizeBlockY);
			fill(0);
			text(tree[i][j].name, tree[i][j].x + sizeBlockX / 2, tree[i][j].y + sizeBlockY / 2 + fontSize / 2);

			if (tree[i][j].hasChild) {
				stroke(255);
				var childs = tree[i + 1].filter(function(value) {
					return value.parent_id == tree[i][j].id;
				});

				for (var k = 0; k < childs.length; k++) {
					line(tree[i][j].x + (sizeBlockX / 2), tree[i][j].y + sizeBlockY, childs[k].x + (sizeBlockX / 2), childs[k].y);
				}
			}
		}
	}
}

function drawMemberBlock(member, x, y) {
	text();
}

function setNewLevel(level, member) {
	if (tree.length < level && level > 1) {
		tree.push([]);
	}

	tree[level - 1].push(member);

	var childs = members.filter(function(value) {
		return value.parent_id == member.id;
	});

	tree[level - 1][tree[level - 1].length - 1].hasChild = (childs.length > 0);

	for (var i = 0; i < childs.length; i++) {
		setNewLevel(level + 1, childs[i]);
	}
}

function getCoords(elements_count, level) {
	var step = width / elements_count;
	console.log(elements_count);
	var result = [];
	var bias =  step / (elements_count * 2);

	if (elements_count == 1) {
		bias -= sizeBlockX / 2;
	}

	for (var i = 0; i < elements_count; i++) {
		result.push([i * step + bias, level * sizeBlockY + (level * sizeBlockY)]);
	}

	return result;
}